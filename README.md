## Seshat API

Installée sur Raspberry Pi 3 avec une base de données PostgreSQL et un serveur ODK Aggregate
dans le cadre du projet de carnet de terrain électronique Seshat disponible ici :

[Dépôt github Seshat](https://github.com/arnouldpy/seshat)

Permet la récupération des données pour l'impression des étiquettes.

### Requête

*[url_raspberry]*/index.php/api/labels

affiche les données en JSON sous la forme d'un tableau d'objets :

````
[
    {
        "label":"BRO_2017-05-23_SED_3_A",
        "project":"MOBISED",
        "date":"2017-05-23 14:51:00.058"
    },
    {
        "label":"JOSAN_2017-05-23_WAT_ACID_2",
        "project":"MOBISED",
        "date":"2017-05-23 14:27:00.21"
    }
]
````