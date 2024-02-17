import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from google.colab import files
from sklearn.cluster import KMeans
import scipy.cluster.hierarchy as sch
import io
import pandas as pd
data = files.upload()

customer_data = pd.read_csv('mall customers.csv')

customer_data.head()

customer_data.info()

customer_data.isnull().sum()

x = customer_data.drop(columns=['CustomerID', 'Gender', 'Age'], axis=1).values

plt.figure(figsize=(15,8))
sns.scatterplot(x[:,0], x[:, 1])
plt.xlabel('Annual Income (k$)')
plt.ylabel('Spending score')
plt.show()

wcss=[]
for i in range (1,11):
  kmeans = KMeans (n_clusters=i, init='k-means++', random_state=2)
  kmeans.fit (x)
  wcss.append(kmeans.inertia_)
plt.figure(figsize=(15,8))
plt.plot(range (1,11), wcss)
plt.title('The Elbow Point Graph')
plt.xlabel('Number of clusters (K)')
plt.ylabel('wcss')
plt.show()

kmeans = KMeans (n_clusters=5, init='k-means++', random_state=0)
Y = kmeans.fit_predict(x)

kmeans.cluster_centers_

plt. figure(figsize=(15,8))
plt.scatter(x[Y==0,0], x[Y==0,1], s=50, c='red', label='Cluster 1')
plt.scatter(x[Y==1,0], x[Y==1,1], s=50, c='pink', label='Cluster 2')
plt.scatter(x[Y==2,0], x[Y==2,1], s=50, c='yellow', label='Cluster 3')
plt.scatter(x[Y==3,0], x[Y==3,1], s=50, c='green', label='Cluster 4')
plt.scatter(x[Y==4,0], x[Y==4,1], s=50, c='orange', label='Cluster 5')
plt.scatter(kmeans.cluster_centers_[:,0], kmeans.cluster_centers_[:,1], s=200, c='black', label='Centroids')
plt.title('Customer Groups')
plt.xlabel('Annual Income')
plt.ylabel('Spending Score')
plt.show()

customer_data = pd.read_csv('mall customers (1).csv')
x = customer_data.drop(columns=['CustomerID', 'Gender', 'Age'], axis=1).values
dendrogram = sch.dendrogram(sch.linkage(x, method = 'ward'))
plt.title('Dendrogam', fontsize = 30)
plt.xlabel('Customers')
plt.ylabel('Ecuclidean Distance')
plt.show()

from sklearn.cluster import AgglomerativeClustering
hc = AgglomerativeClustering(n_clusters = 5, affinity = 'euclidean', linkage = 'ward')
y_hc = hc.fit_predict(x)

km = KMeans(n_clusters = 5, init = 'k-means++', max_iter = 300, n_init = 10, random_state = 0)
y_means = km.fit_predict(x)
plt.scatter(x[y_hc == 0, 0], x[y_hc == 0, 1], s = 100, c = 'pink', label = 'miser')
plt.scatter(x[y_hc == 1, 0], x[y_hc == 1, 1], s = 100, c = 'yellow', label = 'general')
plt.scatter(x[y_hc == 2, 0], x[y_hc == 2, 1], s = 100, c = 'cyan', label = 'target')
plt.scatter(x[y_hc == 3, 0], x[y_hc == 3, 1], s = 100, c = 'magenta', label = 'spendthrift')
plt.scatter(x[y_hc == 4, 0], x[y_hc == 4, 1], s = 100, c = 'orange', label = 'careful')
plt.scatter(km.cluster_centers_[:,0], km.cluster_centers_[:, 1], s = 50, c = 'blue' , label = 'centeroid')
plt.style.use('fivethirtyeight')
plt.title('Hierarchial Clustering', fontsize = 20)
plt.xlabel('Annual Income')
plt.ylabel('Spending Score')
plt.legend()
plt.grid()
plt.show()

