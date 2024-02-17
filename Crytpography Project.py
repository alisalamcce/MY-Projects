import os
from Crypto.Cipher import AES, PKCS1_OAEP
from Crypto.PublicKey import RSA
from Crypto import Random


# Generate an RSA key pair
random_gen = Random.new().read
private_key = RSA.generate(2048)
rsa_public_key = private_key.publickey()
print(type(rsa_public_key))


# Export the public key in DER format
exported_key = rsa_public_key.export_key(format='DER')


def aes_encrypt(data: bytes):
    random_gen = Random.new()
    key = random_gen.read(AES.block_size)
    iv = random_gen.read(AES.block_size)
    cipher = AES.new(key, AES.MODE_CFB, iv)
    msg = iv + cipher.encrypt(data)
    return key, msg


def share_file(filepath: str, recipient_public_key: RSA):
    # Read the file and encrypt it with AES
    with open(filepath, 'rb') as f:
        data = f.read()
    key, encrypted_data = aes_encrypt(data)

    # Encrypt the AES key with RSA
    cipher_rsa = PKCS1_OAEP.new(recipient_public_key)
    encrypted_key = cipher_rsa.encrypt(key)

    # Save the encrypted file and encrypted key to disk
    basename = os.path.basename(filepath)
    encrypted_filepath = f'{basename}.encrypted'
    with open(encrypted_filepath, 'wb') as f:
        f.write(encrypted_data)
    key_filepath = f'{basename}.key'
    with open(key_filepath, 'wb') as f:
        f.write(encrypted_key)

    return encrypted_filepath, key_filepath


def receive_file(encrypted_filepath: str, key_filepath: str, private_key: RSA):
    # Read the encrypted file and encrypted key from disk
    with open(encrypted_filepath, 'rb') as f:
        encrypted_data = f.read()
    with open(key_filepath, 'rb') as f:
        encrypted_key = f.read()

    # Decrypt the AES key with RSA
    cipher_rsa = PKCS1_OAEP.new(private_key)
    key = cipher_rsa.decrypt(encrypted_key)

    # Extract the initialization vector (IV) and encrypted data
    iv = encrypted_data[:AES.block_size]
    data = encrypted_data[AES.block_size:]

    # Decrypt the file with AES
    cipher_aes = AES.new(key, AES.MODE_CFB, iv)
    decrypted_data = cipher_aes.decrypt(data)

    # Save the decrypted file to disk
    basename, _ = os.path.splitext(encrypted_filepath)
    with open(basename, 'wb') as f:
        f.write(decrypted_data)


# Generate an RSA key pair for each user
alice_private_key = RSA.generate(2048)
alice_public_key = alice_private_key.publickey()
bob_private_key = RSA.generate(2048)
bob_public_key = bob_private_key.publickey()

# Alice shares a file with Bob
encrypted_filepath, key_filepath = share_file('secret.txt', bob_public_key)

# Bob receives the file
decrypted_data = receive_file(encrypted_filepath, key_filepath, bob_private_key)
