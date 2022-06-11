
        <main>
        <?php 
             if (!empty($retour)) :
                foreach ($retour as $element) :   
        ?>

        <?php 
                endforeach;
            else :
        ?>
            <tr id="centrerTexteAR">
                <td colspan="11" class="colonneCentrer" >Vous avez aucune aucun produit dans votre panier</td>
            </tr>
        <?php endif; ?>
        </main>
