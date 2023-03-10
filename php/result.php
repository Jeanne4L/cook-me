<?php

    $newRecipeAuthor = strip_tags($_POST['new-recipe__author']);
    $newRecipeCategory = strip_tags($_POST['new-recipe__category']);
    $newRecipeTitle = strip_tags($_POST['new-recipe__title']);
    $newRecipe = strip_tags($_POST['new-recipe__recipe']);
    $newRecipePhoto = $_FILES['new-recipe__photo'];

    if (isset($newRecipePhoto) && $newRecipePhoto['error'] == 0){
        if ($newRecipePhoto['size'] <= 1000000){
            $fileInfo = pathinfo($newRecipePhoto['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions))
            {
                move_uploaded_file($newRecipePhoto['tmp_name'], 'uploads/' . basename($newRecipePhoto['name']));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= $newRecipeTitle ?> - Cook me...</title>
        <link rel="shortcut icon" href="../pictures/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="../style.css">
        <script src="https://kit.fontawesome.com/eafcd51cfc.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <div class="container">
                <a href="../index.html" class="logo">
                    <img src="../pictures/logo.png" alt="dessin d'un œil avec une orange à la place de l'iris" srcset="../pictures/logo.svg">
                </a>
                <nav class="hidden">
                    <ul>
                        <li class="btn">
                            <a href="../new-recipe.html">
                                Créer une recette
                            </a>
                        </li>
                        <li>
                            Catégories
                        </li>
                        <li class="categories-items">
                            <ul>
                                <li>
                                    <a href="result.php&category=aperitif">
                                        Apéritif
                                    </a>
                                </li>
                                <li>
                                    <a href="result.php&category=entree">
                                        Entrée
                                    </a>
                                </li>
                                <li>
                                    <a href="result.php&category=dish">
                                        Plat
                                    </a>
                                </li>
                                <li>
                                    <a href="result.php&category=snack">
                                        Encas
                                    </a>
                                </li>
                                <li>
                                    <a href="result.html&category=dessert">
                                        Dessert
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="last-item">
                            <a href="../connexion.html">
                                Connexion
                            </a>
                        </li>
                        <li class="hidden last-item">
                            <a href="../my-account.html">
                                Mon compte
                            </a>
                        </li>
                    </ul>
                </nav>
                <a href="../search.html">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-xmark"></i>
            </div>
        </header>

        <div class="overlay hidden"></div>

        <div class="container">
            <?php if( isset($newRecipePhoto) && isset($newRecipeAuthor) && isset($newRecipeCategory) && isset($newRecipeTitle) && isset($newRecipe)) : ?>
                <section class="top-section">
                    <img src="uploads/<?= $newRecipePhoto['name'] ?>" alt="photo de <?= $newRecipeTitle ?>">
                    <div class="recipe__desc">
                        <div class="recipe__title">
                            <i class="fa-solid fa-share-nodes"></i>
                            <h1><?= $newRecipeTitle ?></h1>
                            <div class="favorite-icon">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-sharp fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="recipe__info">
                            <span><?= $newRecipeCategory ?></span>
                            <div class="grade">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <p>Cette recette n'a pas encore été notée</p>
                        </div>
                        <p class="recipe__prep"><?= $newRecipe ?></p>
                        <p class="recipe__author"><?= $newRecipeAuthor ?></p>
                    </div>
                </section>

                <section>
                    <h1>Noter la recette</h1>
                    <form action="result.php" method="post">
                        <label for="form-recipe__grade">Note *</label>
                        <div class="form-recipe__grade">
                            <div class="recipe__grade recipe__grade-1">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                                <i class="fa-solid fa-star black-star"></i>
                            </div>                        
                            <div class="recipe__grade recipe__grade-2">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                                <i class="fa-solid fa-star black-star"></i>
                            </div>
                            <div class="recipe__grade recipe__grade-3">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                                <i class="fa-solid fa-star black-star"></i>
                            </div>
                            <div class="recipe__grade recipe__grade-4">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                                <i class="fa-solid fa-star black-star"></i>
                            </div>
                            <div class="recipe__grade recipe__grade-5">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                                <i class="fa-solid fa-star black-star"></i>
                            </div>
                        </div>

                        <label for="form-recipe__author">Nom ou pseudo *</label>
                        <input type="text" name="form-recipe__author" id="form-recipe__author" required>

                        <label for="form-recipe__opinion">Avis</label>
                        <textarea name="form-recipe__opinion" id="form-recipe__opinion" cols="30" rows="10"></textarea>

                        <input type="submit" value="Noter" class="btn">
                    </form>
                </section>
            <?php endif ?>
        </div>

        <footer>
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </body>
</html>