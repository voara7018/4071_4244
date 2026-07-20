#### LISTES DES TACHES

### Version 1

## 1. Création du workspace CodeIgniter 4
- `OK_4244` Installation de CodeIgniter 4 
- `OK_4244` Configuration du fichier `.env`
- `OK_4244` Configuration du fichier `app/config/Database.php`

## 2. Configuration de la base SQLite3
- `OK_4244` Création de la base de données SQLite3
- `OK_4244` Configuration de la connexion dans CodeIgniter
- `OK_4244` Vérification de la connexion

## 3. Création du Git
- `OK_4244` Création du dépôt Git
- `OK_4244` Initialisation du projet
- `OK_4244` Premier commit
- `OK_4244` Ajouter le binome

## 4. Création du script de la base
- `OK_4071` Table `prefixes`
- `OK_4071` Table `users`
- `OK_4071` Tale `types_operations`
- `OK_4071` Table `bareme_frais`
- `OK_4071` Table `solde`
- `OK_4071` Table `transactions`

## 5. Création des modèles
- `OK_4071` PrefixModel
- `OK_4244` TypeOperationsModel
- `OK_4244` BaremeFraisModel
- `OK_4244` ClientModel
- SoldeModel
- TransactionModel

## 6. Création des controllers
- `OK_4071` PrefixController
- `OK_4244` OperationAdminController
- `OK_4244` ClientController
- `OK_4244` ClientsController

## 7. Développement de l'espace opérateur
- Gestion des préfixes
  - Ajouter
  - Modifier
  - Supprimer
  - Lister
- Gestion des types d'opérations
  - Dépôt
  - Retrait
  - Transfert
- Gestion des barèmes de frais
  - Ajouter une tranche
  - Modifier une tranche
  - Supprimer une tranche
- Consultation des gains par frais
- Consultation de la situation des comptes clients

## 7. Développement de l'espace client
- `OK_4244` Connexion avec le numéro de téléphone
- `OK_4244` Création automatique du compte si inexistant
- `OK_4244` Consultation du solde
- `OK_4244` Dépôt
- `OK_4244` Retrait
- `OK_4244` Transfert
- `OK_4244` Historique des transactions

## 8. Validation des opérations
- Vérification du solde avant retrait
- Vérification du solde avant transfert
- Calcul automatique des frais
- Mise à jour automatique des soldes
- Enregistrement des transactions

## 9. Interface utilisateur
- Tableau de bord opérateur
- Tableau de bord client
- Pages CRUD
- Messages de succès et d'erreur