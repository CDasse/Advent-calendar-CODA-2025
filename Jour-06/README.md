# Jour 6 - Une histoire de poids

## Objectif

L'objectif était de sécuriser une fonction de calcul de moyenne de poids pour les lots de cadeaux du Père Noël. La fonction initiale présentait des comportements imprévisibles, notamment lors de calculs avec des résultats décimaux ou des listes de cadeaux vides.

## Solution

Voici les modification que j'ai apporté au code pour que tous les test passent au vert :

 * La variable de somme s est désormais de type **double**. Cela force le compilateur à effectuer une division flottante, conservant ainsi la précision après la virgule.

 * Ajout d'une vérification en début de fonction pour traiter les cas où le tableau est nul (NULL) ou la longueur est inférieure ou égale à 0.

 Défi réussi !


