<?php
session_start();
include('session.php');
include('maininclude/nav.php');
include('database/connection.php');
?>


<body>

    <section id="testimonial_area" class="section-padding p-5">
        <div class="container-fluid p-5">
            <h2 class="text-center ">Student Feedback</h2>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider owl-carousel text-center">
                        <!-- PHP code for selecting data -->
                        <?php
                        $sql = "SELECT s.name, s.occ, s.img, f.f_content FROM studentreg AS s JOIN feedback AS f ON s.id = f.id ";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $s_img = $row['img'];
                        ?>
                                <div class="box-area">
                                    <div class="img-area">
                                        <img src="stuimage/<?php echo $s_img ?>" alt="img" style="width: 100px; height: 100px;" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5><?php echo $row['name']; ?></h5>
                                    <span><?php echo $row['occ']; ?></span>
                                    <p class="content">
                                        <?php echo $row['f_content']; ?>
                                    </p>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <script>
        $(".testimonial-slider").owlCarousel({
            autoplay: true,
            slideSpeed: 1000,
            items: 3,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
            margin: 30,
            dots: true,
            responsive: {
                320: {
                    items: 1
                },
                767: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
</body>

</html>
