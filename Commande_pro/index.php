<?php
/*
 *  Plugin Name: Commande Pro
 */

class Commande_Pro_Menu 
{

    private $plugin_url;
    
    public function __construct() 
    {
        $this->plugin_url = plugins_url( '/', __FILE__ );
        add_action( 'plugins_loaded', array( $this, 'init' ));
    }

    public function init() 
    {
        add_action( 'admin_menu', array( $this, 'add_menu' ));
        add_action( 'admin_menu', array( $this, 'add_submenu' ));
        add_action( 'admin_menu', array( $this, 'add_submenu2' ));
    }

    public function add_menu() 
    {
        $hook = add_menu_page(
            'Commande Pro',                 // Titre
            '<span style="color:#e57300;">Commande Pro</span>', // Titre du menu
            'manage_options',              // Droit requis
            'Commande_pro',         // slug
            array($this,'content'), // fonction appelée
            'dashicons-cart',                      // icon
            90                          // position dans le dashboard
        );
        add_action('admin_print_styles-'.$hook, array( $this, 'styles'));
    }
    public function add_submenu() 
    {
        $subhook = add_submenu_page(
            'Commande_pro', // slug parent
            'Inscription',                 // Titre
            'Inscription', // Titre du menu
            'manage_options',              // Droit requis
            'Inscription',         // slug
            array($this,'sub_content') // fonction appelée
        );
        add_action( 'admin_print_styles-'.$subhook, array($this, 'styles'));
    }
    public function add_submenu2() 
    {
        $subhook2 = add_submenu_page(
            'Commande_pro', // slug parent
            'Modification',                 // Titre
            'Modification', // Titre du menu
            'manage_options',              // Droit requis
            'Modification',         // slug
            array($this,'sub_content2') // fonction appelée
        );
        add_action( 'admin_print_styles-'.$subhook2, array($this, 'styles'));
    }
public function content()
    {
        ?>
        <form class="form-inline col-lg-12">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="col-lg-1">
                    <div class="titre_commande">
                            <span class="dashicons dashicons-cart"></span>  
                    </div>
                    </div>
                    <div class="col-lg-9">
                    <div class="titre_commande">
                        <h1>Commande Pro Clipcann</h1>
                    </div>
                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="form-inline">
                            <div class="col-lg-4">
                                    <div class="ul_inscription">
                                        <ul>
                                            <li>
                                                <a href="http://localhost/wordpress/wp-admin/admin.php?page=Inscription">
                                                    <input class="lien_inscription" type="button" name="lien_inscription" value="Inscription"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                    </div>
                </div>
        </form>
            <div class="commande_pro">
                <table class="tableau" border=1>
                    <tbody class="commande">
                        <tr>
                            <th class="id">
                                Id
                            </th>
                            <th class="Nom">
                                Nom
                            </th>
                            <th class="SIREN">
                                SIREN
                            </th>
                            <th class="Clipcann">
                                Nb Clipcann
                            </th>
                            <th class="Date">
                                Date
                            </th>
                            <th class="modifier">
                                Modifier
                            </th>
                            <th class="supprimer">
                                Supprimer
                            </th>
                        </tr>
                        <tr>
                            <td class="id">
                                1
                            </td>
                            <td class="Nom">
                                Moity
                            </td>
                            <td class="SIREN">
                                0000000
                            </td>
                            <td class="Clipcann">
                                1200
                            </td>
                            <td class="Date">
                                16/01/2020
                            </td>
                            <td class="modifier">
                                <a href="http://localhost/wordpress/wp-admin/admin.php?page=Modification"><input type="button" name="modifier" value="modifier"/></a>
                            </td>
                            <td class="supprimer">
                                <input type="button" name="supprimer" value="supprimer"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <?php
    }
    public function sub_content() 
    {?>
        <form class="form-inline col-lg-12">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="col-lg-1">
                    <div class="titre_commande">
                            <span class="dashicons dashicons-cart"></span>  
                    </div>
                    </div>
                    <div class="col-lg-9">
                    <div class="titre_commande">
                        <h1>Commande Pro Clipcann</h1>
                    </div>
                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="form-inline">
                            <div class="col-lg-4">
                                    <div class="ul_inscription">
                                        <ul>
                                            <li>
                                                <a href="http://localhost/wordpress/wp-admin/admin.php?page=Commande_pro">
                                                    <input class="lien_inscription" type="button" name="lien_inscription" value="Commande Pro"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                    </div>
                </div>
        </form>     
                    <div class="generateur">
                        <form method="post">
                            <button class="generer" type="submit" name="mdp" value="mdp">Générer un mot de passe</button>
                        </form>
                    <?php   
                        $caract="ABCDEFGHIJKLMNOPQRSTUVWXYabcdefghijklmnopqrstuvwyxz0123456789@!/?*$=+";

                        if(isset($_POST['mdp']))
                        {
                            echo 'Le mot de passe généré est : </br>';
                            for($i=1;$i<=24;$i++) 
                            {
                        
                                // On compte le nombre de caractères
                                $Nbr=strlen($caract);
                                    
                                // On choisit un caractère au hasard dans la chaine sélectionnée :
                                $Nbr=mt_rand(0,($Nbr-1));
                                    
                                // Pour finir, on écrit le résultat :
                           
                                echo $caract[$Nbr];
                            }
                        }?>
                    
                    </div>
                    <div class="col-lg-6">
                    <div class="inscription">
                        <form method="post">
                            <div class="col-lg-10">
                            <label>
                                Nom : 
                            </label>
                                <input type="text" name="Nom" value=""/></br></br>
                                <label>
                                Prénom : 
                            </label>
                                <input type="text" name="Prenom" value=""/></br></br>
                            <label>
                                Adresse : 
                            </label>
                                <input type="text" name="Adresse" value=""/></br></br>
                            <label>
                                Téléphone : 
                            </label>
                                <input type="text" name="Telephone" value=""/></br></br>
                            <label>
                                Email : 
                            </label>
                                <input type="email" name="Email" value=""/></br></br>
                            <label>
                                Mot de passe : 
                            </label>
                                <input type="password" name="Password" value=""/></br></br>
                            <label>
                                SIRET : 
                            </label>
                                <input type="text" name="SIRET" value=""/></br></br>
                            <div class="col-lg-12">
                            <button class="valider" type="submit" name="Valider" value="Valider">
                                Valider
                            </button>
                            <div>
                            </div>
                        </form>
                    </div>
                    </div><?php
        
    }
    public function sub_content2()
    {?>
           <form class="form-inline col-lg-12">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="col-lg-1">
                    <div class="titre_commande">
                            <span class="dashicons dashicons-cart"></span>  
                    </div>
                    </div>
                    <div class="col-lg-9">
                    <div class="titre_commande">
                        <h1>Commande Pro Clipcann</h1>
                    </div>
                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="form-inline">
                            <div class="col-lg-4">
                                    <div class="ul_inscription">
                                        <ul>
                                            <li>
                                                <a href="http://localhost/wordpress/wp-admin/admin.php?page=Inscription">
                                                    <input class="lien_inscription" type="button" name="lien_inscription" value="Inscription"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://localhost/wordpress/wp-admin/admin.php?page=Commande_pro">
                                                    <input class="lien_commande" type="button" name="lien_commande" value="Commande Pro"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                    </div>
                </div>
        </form> 
        <div class="commande_pro">
            <form method="post">
                <table class="tableau" border=1>
                    <tbody class="commande">
                        <tr>
                            <th class="id">
                                Id
                            </th>
                            <th class="Nom">
                                Nom
                            </th>
                            <th class="Prenom">
                                Prénom
                            </th>
                            <th class="Email">
                                Email
                            </th>
                            <th class="Telephone">
                                Téléphone
                            </th>
                            <th class="SIREN">
                                SIREN
                            </th>
                            <th class="Adresse">
                                Adresse
                            </th>
                            <th class="nb_clipcann">
                                Nb Clipcann
                            </th>
                            <th class="nb_commande">
                                Nb Commande
                            </th>
                            <th class="montant">
                                Montants Commandes
                            </th>
                            <th class="date">
                                Date dernière commande
                            </th>
                        </tr>
                        <tr>
                            <td class="id">
                                1
                            </td>
                            <td class="Nom">
                                Moity
                            </td>
                            <td class="Prenom">
                                Anthony
                            </td>
                            <td class="Prenom">
                                anthony.ohdass@gmail.com
                            </td>
                            <td class="Prenom">
                                0666910520
                            </td>
                            <td class="SIREN">
                                0000000
                            </td>
                            <td class="Adresse">
                                63 rue du pont de Try
                            </td>
                            <td class="Clipcann">
                                1200
                            </td>
                            <td class="Nbcommande">
                                6
                            </td>
                            <th class="id">
                                6000€
                            </th>
                            <th class="id">
                                16/01/2020
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <?php
    }

    # Pour utiliser un fichier css
    public function styles() 
    {
        wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
        wp_enqueue_style('bootstrap', $this->plugin_url.'bootstrap_lib/css/bootstrap.css');
        wp_enqueue_style('Commande_Pro',$this->plugin_url.'css/css.css');
    }
}

new Commande_Pro_Menu();
