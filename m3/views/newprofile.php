
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prime Estate - My Profile Results</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" action="profilehandler.php" method="post" >
        <fieldset>
          <!-- Form Name -->
          <legend>Home Preferences</legend>

          
           <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Price</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Min" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Maximum</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Max" class="form-control">
            </div>
          </div>
           
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-10">
              <input type="text" placeholder="City" class="form-control">
            </div>
          </div>


          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Zip</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Zip / Postal Code" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Bedrooms</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Bedrooms" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Bathrooms</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Bathrooms" class="form-control">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Details</label>
            <div class="col-sm-10">
              <input type="textarea" placeholder="Please enter your personal preferences here" class="form-control">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->