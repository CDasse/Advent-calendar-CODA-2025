# Jour 3 - Le script fantôme

## Notre mission

La mission du jour est de comprendre pourquoi le script du Père Noël ne s'execute pas.

## Problème rencontré

Lorsque l'on execute le script, nous rencontrons cette erreur :

```
bash: ./backup.sh: Permission denied
```

Nous pouvons alors vérifier les droits d'execution avec la commande :

```
ls -l backup.sh
```

Voici la sortie :

```
-rw-r--r-- 1 root root 192 Dec  3 09:10 backup.sh
```
Nous constatons alors que personne n'a le droit d'executer le script.

## Petite explication sur la notation octale pour les permissions :

| Lettre     | Droit       | Valeur Octale |
|:----------:|:----------- |:-------------:|
| r          | read        | 4             |
| w          | write       | 2             |
| x          | execute     | 1             |

De plus, chaque fichier possède trois groupes de permissions :
 * Utilisateur (u) : le propriétaire
 * Groupe (g) : les membres du groupe
 * Autre (o) : tous les autres utilisateurs


 ## Solution

Pour corriger les droits, nous devons utiliser la commande `chmod`.

Ici, nous voulons que seul le Père Noël est les droits pour exécuter le script.
Les elfes ne doivent pas pouvoir modifier ou executer le script. Nous leur laissons tout de même la possibilité de lire la liste des enfants sages.

Nous utilisons donc la commande :
```
chmod 740 backup.sh
```

> Explications : Père Noël = 4 (read) + 2 (write) + 1 (execute)

## Résultat

Les fichier s'execute et nous obtenons un message de confirmation :

```
./backup.sh
🔒 Sauvegarde en cours...
🎁 La liste des enfants sages a bien été sauvegardée !
```

Mission accomplie !!