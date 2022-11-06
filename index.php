<?php 
include('includes/header.php'); 
?>
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="images/1.jpg" alt="First slide">
        <div style="top:50%" class="carousel-caption d-none d-md-block">
           <a href="view.php?img=view" type="button" class="sliderBtn"> Book Now</a>
        </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
        <div style="top:50%" class="carousel-caption d-none d-md-block">
            <a href="view.php?img=view" type="button" class="sliderBtn"> Book Now</a>
        </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
        <div style="top:50%" class="carousel-caption d-none d-md-block">
            <a href="view.php?img=view" type="button" class="sliderBtn"> Book Now</a>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <h4 class="mb-4 title">View Our Rooms</h4>
            </div>
            <div class="row mb-5">
            <?php
                $sql="SELECT * from Rooms";
                $query = $db->query($sql);
                while($row = $query->fetch())
                {    
            ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail edit_data4" href="#" data-image-id="" data-toggle="modal" 
                    data-title="Executive bedroom" 
                    data-caption="Relax your moment with executive lounge" data-image="images/rooms/<?php echo $row['roomPICT'] ?>" 
                    data-target="#image-gallery">
                    <img class="img-responsive" src="images/rooms/<?php echo $row['roomPICT'];?>" alt="rooms">
                    <div class="text-center"><button id="<?php echo $row['roomPICT'];?>" class="btn btn-sm btn-primary"> View Details </button></div>
                </a>
            </div>
            <?php	
				} 
           ?> 
            </div>
        </div>
    </section>

    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image"  class="img-responsive full" src="">
                <div class="btnDiv">
                    <a href="view.php" type="type" class="detailBtn"> View more </a>
                </div>
            </div>

        </div>
    </div>
    </div>
		
<?php include('includes/footer.php'); ?>