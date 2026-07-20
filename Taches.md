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
- `OK_4071` Table `prefixes`(id, prefix, operateur_id)
- `OK_4071` Table `users`(id, numero)
- `OK_4071` Tale `types_operations`(id, nom)
- `OK_4071` Table `bareme_frais`(id,min,max,pourcentage)
- `OK_4071` Table `solde`(id, user_id, montant)
- `OK_4071` Table `transactions`(id, user_id, montant, type_operation_id, operateur_id, date, status)

## 5. Création des modèles
- `OK_4071` PrefixModel
- `OK_4244` TypeOperationsModel
- `OK_4244` BaremeFraisModel
- `OK_4244` ClientModel
- `OK_4244` SoldeModel
- `OK_4244` TransactionModel

## 6. Création des controllers
- `OK_4071` PrefixController
- `OK_4244` OperationAdminController
- `OK_4244` ClientController
- `OK_4244` ClientsController

## 7. Développement de l'espace opérateur
- `OK_4071` Gestion des préfixes
  - `OK_4071` Ajouter
  - `OK_4071` Lister
- `OK_4071` Gestion des types d'opérations
  - `OK_4071` Dépôt
  - `OK_4071` Retrait
  - `OK_4071` Transfert
- `OK_4071` Gestion des barèmes de frais
  - `OK_4071` Ajouter une tranche
- `OK_4071` Consultation des gains par frais
- `OK_4071` Consultation de la situation des comptes clients

## 7. Développement de l'espace client
- `OK_4244` Connexion avec le numéro de téléphone
- `OK_4244` Création automatique du compte si inexistant
- `OK_4244` Consultation du solde
- `OK_4244` Dépôt
- `OK_4244` Retrait
- `OK_4244` Transfert
- `OK_4244` Historique des transactions

## 8. Validation des opérations
- `OK_4244` Vérification du solde avant retrait
- `OK_4244` Vérification du solde avant transfert
- `OK_4244` Calcul automatique des frais
- `OK_4244` Mise à jour automatique des soldes
- `OK_4244` Enregistrement des transactions


### Version 2

## 1. Modifications de la Base de Données
- `OK_4244` Ajouter la table `operateurs` (id, nom, is_local)
- `OK_4244` Ajouter la table `commissions_externes` (id, pourcentage)
- `OK_4244` Modifier la table `prefixes` en rajoutant la colonne `operateur_id` (clé étrangère)
- `OK_4244` Modifier la table `transactions` en rajoutant la colonne `frais_externe` et `operateur_destinataire_id`

## 2. Création et Modification des Modèles
- `OK_4071` OperateurModel
- `OK_4071` CommissionExterneModel
- `OK_4071` Modifier `PrefixesModel.php` pour inclure la jointure vers la table `operateurs`
- `OK_4071` Modifier `TransactionModel.php` pour autoriser les nouveaux champs et Ajouter les requêtes de statistiques (gains internes/externes, dettes opérateurs)

## 3. Développement Côté Opérateur
- `OK_4244` Modifier `PrefixeController.php` et la vue `prefixes.php` : Ajouter un champ pour choisir ou définir l'opérateur associé au préfixe
- Ajouter `CommissionController.php` et la vue `commission.php` : Interface de configuration du pourcentage de commission externe
- Modifier `app/Config/Routes.php` et `app/Views/layouts/sidebar.php` : Ajouter les routes et les liens pour la nouvelle page de commission
- Modifier `TransactionController.php` et la vue `situation.php` :
  - Séparer les gains provenant des frais (opérateur) et les gains des commissions supplémentaires (autres opérateurs)
  - Ajouter un tableau affichant les montants à envoyer (dettes) à chaque opérateur externe

## 4. Développement Côté Client
- Modifier `faireTransfert.php` :
  - Modifier le champ de saisie du destinataire pour accepter plusieurs numéros séparés par des virgules
  - Ajouter une case à cocher "Option inclure les frais de retrait lors de l'envoi"
- Modifier `ClientsController.php` (méthode `traiterTransfert`) :
  - Ajouter la logique de division du montant total par le nombre de destinataires (Envoi multiple)
  - Ajouter la détection de l'opérateur destinataire (interne ou externe) via le préfixe
  - Ajouter le calcul de la commission externe si transfert vers un autre opérateur
  - Ajouter le calcul des "frais de retrait" si l'option est cochée : ajouter ce coût au débit de l'expéditeur pour que le bénéficiaire reçoive le montant brut nécessaire
  - Modifier l'enregistrement de la transaction pour inclure `frais_externe` et `operateur_destinataire_id`

