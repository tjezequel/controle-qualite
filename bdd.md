### BDD

`Given` Un produit non livre a 30 €
`When` On calcule le montant de la TVA
`Alors` Le montant de la TVA est de 6 €

`Given` Un livre a 30 €
`When` On calcule le montant de la TVA
`Alors` Le montant de la TVA est de 1,65 €

`Given` Un panier vide
`When` L'utilisateur ajoute un produit non livre a 10 €
`And` L'utilisateur ajoute un livre a 10 €
`Then` Le montant total du panier est de 17,55 €

`Given` Un panier vide
`When` L'utilisateur ajoute un produit non livre a 30 €
`And` L'utilisateur ajoute un livre a 35 €
`Then` le montant total du panier est 72,93 €

`Given` Un panier dont le montant total HT des produits est supérieur a 50 €
`Quand` On calcule les frais de ports
`Then` Les frais de port sont gratuits

`Given` Un panier dont le montant total HT des produits est inférieur a 50 €
`Quand` On calcule les frais de ports
`Then` Les frais de port sont de 5 €

`Given` Un Panier vide
`When` L'utilisateur se rends sur la page avec pour url `/panier`
`Then` On obtient un code http 200

`Given` Un panier contenant un produit non livre a 10 €
`And` un livre a 10 €
`When` L'utilisateur se rends sur la page avec pour url `/panier`
`Then` On affiche la page avec le prix de chaque article
`And` Un montant total de commande de 27,55 €

 