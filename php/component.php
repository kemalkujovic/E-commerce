<?php
function component(){
    $element = '
    <div class="col-md-3 col-sm-6 my-3 my-md-0">
    <form action="index.php" method="post">

        <div class="card shadow">
            <div>
                <img src="./upload/product1.png" alt="slika1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
                <h5 class="card-title">Product1</h5>
                <h6>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </h6>
                <p class="cart-text">
                    Some quick example text to build on the card
                </p>
                <h5>
                    <span class="price">$599</span>
                </h5>
                <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
            </div>
        </div>
    </form>
    </div>
    ';
    echo $element;
}