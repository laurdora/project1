@include('layouts.nav')


<div style='margin-top:5%' class="container-fluid">

    <div class="row">
        <div class="col-md-8 col-md-offset-3"> <!-- width and position of the outside border box -->
            <div class="panel panel-default"> <!-- do not delete this (it's outside border lines) -->
                <div class="panel-heading"><h3 style="margin-left: 38%">Create description</h3></div>

                    <div class="panel-body" style="margin-left: 10%; margin-right: 10%; margin-top: 3%">
                        <h4 style="float: left;">Item Category</h4>
                            <select class="form-control">
                                <option>Fashion</option>
                                <option>Electronics</option>
                                <option>Sports</option>
                                <option>Health</option>
                                <option>Toy</option>
                            </select>
                        
                            <div class="form-group" style="float: left;"> <!-- title -->
                                <form class="form-inline">
                                    <label class="sr-only" for="exampleInputAmount"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                            <div class="input-group-addon">.00</div>
                                        </div>
                                </form>
                            </div>
                        
                        <input type="text" class="form-control" placeholder="Title" />
                    </div>

                    <!-- add another div here -->
                        <textarea class="form-control" rows="3" placeholder="Description"></textarea>

                        <h4>Description</h4>
                        <input class="btn btn-default" type="submit" value="Submit">
                   
                </div>
            </div>
        </div>
</div>
<!-- <div class="upload-container">
    <form>
        <fieldset>
            <legend>Create description</legend>
        </fieldset>
        
        <select multiple="multiple">Item Category
            <option>Food</option>
            <option>House</option>
            <option>Music</option>
            <option>Pet</option>
        </select>

        <div class="input-prepend input-append">
            <span class="add-on">$</span>
            <input class="span2" id="appendedPrependedInput" type="text">
            <span class="add-on">.00</span>
        </div>
    </form>
</div>

-->
@include('layouts.footer')