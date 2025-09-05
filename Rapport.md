# Rapport de tests unitaires – Projet Biblio-React

## 1. Introduction
Dans le cadre de ce projet, des tests unitaires ont été mis en place avec PHPUnit pour vérifier automatiquement que des parties isolées du code (principalement les entités du domaine) se comportent comme prévu.

Pourquoi faire des tests unitaires ?
- Fiabilité : s’assurer que le code se comporte correctement.
- Prévention des régressions : détecter rapidement les impacts de futures modifications.
- Documentation vivante : les tests décrivent l’usage attendu du code.
- Gain de temps : moins de débogage manuel sur les fonctionnalités critiques.

## 2. Préparation de l’environnement
- Duplication du backend : pour isoler l’activité de test du projet principal, une copie dédiée existe sous le dossier `backend-tests`.
- Installation de PHPUnit : la suite de tests s’exécute via Composer dans `backend-tests`.
- Organisation : les tests sont rangés dans le répertoire `backend-tests/tests/` afin de séparer le code de production et le code de test.

Exécution rapide dans `backend-tests` :
- `composer install`
- `php bin/phpunit`

Résultat actuel de la suite : OK (5 tests, 7 assertions).

## 3. Tests réalisés sur les entités
### 3.1 Entité Book
Objectif : vérifier le bon fonctionnement des propriétés de base (titre, image, description, pages) et des relations.

Vérifications effectuées :
- Les getters/setters restituent les valeurs assignées pour les propriétés de base.
- La relation ManyToOne vers `Author` est correctement établie.
- La relation ManyToOne vers `Category` est correctement établie.

Résultats : conformes aux attentes.

### 3.2 Entité Author
Objectif : s’assurer que les informations d’un auteur (prénom, nom, pays) sont stockées et restituées correctement.

Vérifications effectuées :
- Les getters/setters renvoient les valeurs définies.
- La relation inverse OneToMany avec `Book` fonctionne via l’association côté livre.

Résultats : conformes aux attentes.

### 3.3 Entité Category
Objectif : valider la catégorisation des livres et l’intégrité de la relation inverse.

Vérifications effectuées :
- Les getters/setters renvoient les valeurs définies.
- L’ajout d’un `Book` dans une `Category` met à jour les deux côtés de la relation (`Category#books` et `Book#category`).

Résultats : conformes aux attentes.

## 4. Données de test et fixtures
Des fixtures ont été mises en place afin de disposer de données cohérentes pour les essais manuels et l’exploration de l’API :
- Auteurs : Antoine de Saint-Exupéry, George Orwell, J. K. Rowling
- Catégories : Classique, Dystopie, Fantasy
- Livres : Le Petit Prince, 1984, Harry Potter à l’école des sorciers

Ces données facilitent la validation au niveau API (lecture/liste) et la démonstration du modèle relationnel.

## 5. Conclusion
Les tests unitaires réalisés sur les entités `Book`, `Author` et `Category` montrent que :
- Les getters et setters fonctionnent correctement pour les propriétés essentielles.
- Les relations entre entités (`Book` → `Author`, `Book` → `Category`, ainsi que les côtés inverses) sont valides et cohérentes.
- Le code de base est fiable et constitue une fondation solide pour l’extension de fonctionnalités.

Pistes d’amélioration :
- Tests fonctionnels (ex. scénarios complets de recherche/liste/filtrage de livres).
- Tests d’intégration API pour valider la persistance réelle (création/lecture/mise à jour/suppression) et les contraintes de validation.
- Intégration continue (CI) afin d’exécuter automatiquement la suite de tests à chaque push et sur chaque pull request.
