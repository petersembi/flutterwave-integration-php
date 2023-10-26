<!-- 
/**
    - This code illustrates flutterwave payment gateway integration
    - Feel free to use it for learning purposes    - 
    - author: Peter Musembi
    - email: petmapps@gmail.com
    - For any programming task you need done contact the above email
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flutterwave Payment Integration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row p-3">
           
            <div class="col-md-3"></div>
            <div class="col-md-6 p-3">
                 <h3 class="mb-3">Flutterwave Payment Integration - PHP </h3>
                <div class="card p-3">
                    
                    <form action="initiatepayment.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Your Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
               
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
            </form>
                </div>
            </div>
            <div class="col-md-3"></div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>