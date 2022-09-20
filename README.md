# INF6150

# Structure
Le document possède
* package.json qui donne des informations sur le projet et de ses dépendances.
* package-lock.json qui donne des informations sur les versions des dépendances.

* Un dossier "node xxx" sera automatiquement créé à l'installation, il contient les dépendences.

# Installation
In order to install all the prerequises, simply do 
"npm install".

This will create a directory that contains all the dependencies Node uses.
This directory cannot be pushed and should not be pushed to master.

Thus, .gitignore prevents the push.


# Dependencies
If you need an additional component, use
*npm install XXX*

This will automatically update package(-lock).json with according dependencies.

# Utilisation
En utilisant la console, que ce soit sur Visual studio code ou en Bash, la ligne de commande "node file.js" permet d'exécuter le script Javascript en console.

Executer node http_init.js permet d'ouvrir http_init.js sur le localhost:5000
