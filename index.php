<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-4">
            <section class="section">
                <div class="container-fluid py-5 shadow ms-4" style="height: 100vh;">
                 <div class="d-flex flex-row mb-3 text-center">
                    <div class="col-md-12">
                        <h5>Puerto Princesa Memorial Park</h5>  
                        <p>Cemetery Database Management System</p>
                    </div>
                 </div>
                </div>
            </section>
        </div>
        
        <div class="col-md-8">
            <section class="section">
                <div class="container">
                   <div id="carouselExampleDark" class="carousel slide" style="height: 50vh;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="resource/img/1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
        </div>
        <div class="carousel-item">
            <img src="resource/img/2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
        </div>
        <div class="carousel-item">
            <img src="resource/img/3.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
<style>
    #carouselExampleDark {
    height: 400px; 
}

#carouselExampleDark .carousel-inner,
#carouselExampleDark .carousel-item {
    height: 100%;
}

#carouselExampleDark img {
    object-fit: cover;
    height: 100%;
}
</style>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>