# Jour 4 - Bataille de biscuit

## Objectif

L'objectif du jour était de trouver, à partir de la liste 
des calories contenues dans les douceurs de chaque elfe, le top 3 
des elfes transportant le plus de calories.

## Solution

Pour cela, j'ai décider de parser et de faire des calculs sur le fichier `data` en PHP.

J'ai eu besoin de quelques fonction PHP :

* **file_get_contents** : permet de lire un fichier en string ;
* **preg_split** : permet de couper un string en fonction d'une expression régulière ;
* **arsort** : trie un tableau en ordre décroissant ;
* **array_slice** : permet d'extraire des données d'un tableau ;
* **substr** : retourne une partie d'un string ;
* **strpos** : trouve la position de la première occurence d'un terme dans un string.

## Problème rencontré

Je me suis aperçue que certains elfes apparaîssaient plusieurs fois dans le fichier.
J'ai donc crée un système de clé unique pour que les totals de calories ne s'additionnent pas.

## Conclusion

🏆 Top 3 des Livraisons les plus Caloriques <br>
#1 : Susanoo avec 57177 calories<br>
#2 : Maeve avec 52791 calories<br>
#3 : Set avec 52573 calories


Défi réussi !