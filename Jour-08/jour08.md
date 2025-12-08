# Jour 8 - Les 3 enfants les plus sages

L'objectif du jour est d'identifier les enfants les plus sages et de trouver leur localisation.

## Installation d'un manager de base de donnée

J'ai installé DBeaver et ai importé notre fichier `kids.db`.

## Requète SQL

Je peux alors faire ma requète SQL pour récupérer les informations des trois enfants les plus sages :

```sql
SELECT
	b.nice_score,
	c.first_name,
	c.last_name,
	p.x_m AS coordonnee_x,
	p.y_m AS coordonnee_y
FROM children c
INNER JOIN behavior b ON b.child_id = c.id
INNER JOIN elf_plan p ON p.child_id = c.id

ORDER BY b.nice_score DESC
LIMIT 3;
```

> Remarque : Il y a plus que 3 enfants avec un score de 100. Je sélectionne les 3 premiers fournis par la base de donnée.

Résultat de la requète :

| nice_score | first_name | last_name | coordonnee_x        | coordonne_y       |
| :--------- | :--------- | :-------- | :------------------ | :---------------- |
| 100.0	     | Astrid	  | Lopez	  | 263850.2181406793   | 6253825.689159202 |
| 100.0	     | Isha	      | Takahashi |	12956655.56562792   | 4853110.98622232  |
| 100.0	     | Omar       |	Costa     |	-13626856.045782633 | 4549885.722212345 |

## Visualisation sur une carte

Je convertis les coordoonées en format latitude/longitude.

* Astrid Lopez = longitude 2°22'12.745" / latitude 48°52'33.14"
* Isha Takahashi = longitude 116°23'29.822" / latitude 39°54'41.92"
* Omar Costa = longitude -122°24'43.67" / latitude 37°47'26.135"


![Carte du monde avec localisation des enfants](carte.png)

Défi réussi !!
