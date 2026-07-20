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
- `OK_4071` Table `clients`
- `OK_4071` Table `types_operations`
- `OK_4071` Table `tranches_frais`
- `OK_4071` Table `comptes`
- `OK_4071` Table `transactions`

## 5. Création des modèles (Models)
- PrefixModel
- ClientModel
- TypeOperationModel
- TrancheFraisModel
- CompteModel
- TransactionModel

## 6. Développement de l'espace opérateur
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
- Connexion avec le numéro de téléphone
- Vérification du préfixe
- Création automatique du compte si inexistant
- Consultation du solde
- Dépôt
- Retrait
- Transfert
- Historique des transactions

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