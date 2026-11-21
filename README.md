# Rapport de TP7:Conception et CRUD multi-entités

## Objectif du TP
**L’objectif de ce TP est de concevoir et développer une application Web de gestion d’un centre de formation. Il consiste à analyser les besoins, identifier les entités et leurs relations, créer une base de données MySQL et mettre en place les opérations CRUD (ajout, affichage, modification et suppression) en utilisant PHP et PDO.**

## Technologies utilisées
- HTML : structure des pages.
- CSS : mise en forme.
- PHP : traitement des données.
- MySQL : gestion de la base de données.
- XAMPP : environnement de développement local.

## Phase de conception

1. Identifier les entités et leurs attributs
- Formation: ID, Titre, Description, Durée et Langue.
- Etudiant: Numero, Nom, Prenom, Age, Telephone et Email.
- Module: ID_module, Titre, Description et Nbre_heures.

- Clés primaires :ID, Numero, ID_module.
- Clés étrangères :ID_Formation dans Etudiant et Module.

2. Construire le diagramme
<img width="892" height="645" alt="image" src="https://github.com/user-attachments/assets/ae675697-1494-4f10-b826-c03dd8a87b58" />

## Création de la base MySQL

1. Créer la base et les tables
*les tables dans phpMyAdmin*
<img width="1546" height="303" alt="image" src="https://github.com/user-attachments/assets/dd780f66-9bdb-4f14-bd6b-435731d102b0" />

*les attributs de chaque table*
<img width="1511" height="522" alt="image" src="https://github.com/user-attachments/assets/80ed520e-299b-436c-a85e-88e2559b463b" />
<img width="1530" height="610" alt="image" src="https://github.com/user-attachments/assets/dff9f686-bf4d-4544-882e-d8d580c4c149" />
<img width="1528" height="524" alt="image" src="https://github.com/user-attachments/assets/f6a48676-e817-44e8-80d7-5f8c8efc09fc" />

*les données de test*
<img width="1522" height="577" alt="image" src="https://github.com/user-attachments/assets/efd283fc-b8a8-432f-8e51-a95c2e8bda8b" />
<img width="1535" height="570" alt="image" src="https://github.com/user-attachments/assets/b891579a-8f7e-4ea4-9a20-1822ea4b7264" />
<img width="1488" height="610" alt="image" src="https://github.com/user-attachments/assets/1e132da1-ec05-4888-b39a-45e9e41f7b34" />

## Développement et test du CRUD

1. READ:afficher les données
Pour cette activité, j'ai créé une page index.php pour chaque entité (formation, étudiant et module). Chaque page utilise une requête SQL SELECT avec PDO pour récupérer les données de la base de données. La méthode fetchAll(PDO::FETCH_ASSOC) permet de récupérer les résultats sous forme de tableau associatif. Ensuite, les informations sont affichées dans un tableau HTML avec des liens permettant de modifier ou de supprimer chaque enregistrement. Pour les étudiants et les modules, une jointure SQL permet également d'afficher le nom de la formation au lieu de son identifiant numérique.
<img width="1919" height="530" alt="image" src="https://github.com/user-attachments/assets/3efcb4cf-4af9-4a36-9b71-770399e629bc" />
<img width="1911" height="583" alt="image" src="https://github.com/user-attachments/assets/dd0ae1ee-fc96-4236-8572-1436e735f8e1" />
<img width="1915" height="616" alt="image" src="https://github.com/user-attachments/assets/d963b08c-40ef-4992-8caf-2613cddfecd5" />

2. CREATE- ajouter un enregistrement
Pour cette activité, j'ai créé une page create.php pour chaque entité afin de permettre l'ajout de nouveaux enregistrements à l'aide de formulaires HTML. Les données saisies sont récupérées avec $_POST, puis une requête SQL INSERT est préparée avec prepare() et exécutée avec execute() pour enregistrer les informations dans la base de données. Après l'ajout, l'utilisateur est redirigé vers la page index.php. Pour les étudiants et les modules, une liste déroulante select permet de choisir une formation existante depuis la base de données.
*test dans Formation*
<img width="882" height="852" alt="image" src="https://github.com/user-attachments/assets/5641f717-c33a-4951-b475-dc3fd90a6a06" />
<img width="1917" height="485" alt="image" src="https://github.com/user-attachments/assets/0140a39c-335c-4f6a-950c-272544e9c6fa" />
*enregistrement dans phpMyAdmin*
<img width="1177" height="255" alt="image" src="https://github.com/user-attachments/assets/91e50cbd-8a93-4fd3-98a3-a673283b8423" />

3. : UPDATE- modifier un enregistrement
Pour cette activité, j'ai créé une page edit.php pour chaque entité afin de permettre la modification des enregistrements. L'identifiant de l'élément est récupéré pour charger ses données depuis la base de données. Les valeurs existantes sont affichées dans un formulaire prérempli. Après la modification, les données sont envoyées avec POST, puis une requête SQL UPDATE avec une clause WHERE est préparée et exécutée avec PDO. Enfin, l'utilisateur est redirigé vers la page index.php.
*test dans Etudiant*
<img width="756" height="862" alt="image" src="https://github.com/user-attachments/assets/f8298098-0ba1-42a4-a69a-b6307b17d640" />
*modification de l'age et telephone*
<img width="775" height="870" alt="image" src="https://github.com/user-attachments/assets/cfc39670-c8cf-4f7d-8248-053ad1a591c4" />
<img width="1916" height="349" alt="image" src="https://github.com/user-attachments/assets/59495fcd-977a-45fb-b41b-ba62546f6e2d" />
<img width="1225" height="187" alt="image" src="https://github.com/user-attachments/assets/3397fc6f-a2f2-4b2a-a863-bbf815f2d7d6" />

4. DELETE- supprimer un enregistrement
Pour cette activité, j'ai créé une page delete.php pour chaque entité afin de permettre la suppression des enregistrements. L'identifiant de l'élément à supprimer est récupéré, puis une requête SQL DELETE est préparée avec PDO et exécutée avec execute(). La clause WHERE permet de cibler uniquement l'enregistrement choisi. Après la suppression, l'utilisateur est redirigé vers la page index.php. Les relations entre les tables sont également prises en compte pour éviter les problèmes lors de la suppression.
*test dans Module*
<img width="1896" height="369" alt="image" src="https://github.com/user-attachments/assets/8f85ecbf-595c-48e1-9760-e393c30e3749" />
<img width="1904" height="413" alt="image" src="https://github.com/user-attachments/assets/9ceb60c8-d58a-401d-89b2-37c2003a713b" />
<img width="1232" height="171" alt="image" src="https://github.com/user-attachments/assets/96e16e58-8792-4879-97f2-b56f0c3daa8c" />

## Page d’accueil
Pour cette activité, j'ai créé une page d'accueil index.php qui permet d'accéder facilement aux trois espaces de gestion de l'application : formations, étudiants et modules. Chaque espace contient un lien vers sa page index.php pour afficher la liste des enregistrements. Cette page facilite la navigation entre les différentes fonctionnalités de l'application.
<img width="1917" height="883" alt="image" src="https://github.com/user-attachments/assets/027819d7-42b4-4178-b302-5d2cb5df913d" />


