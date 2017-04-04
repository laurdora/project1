@include('layouts.nav')


<div style='margin-top:5%' class="container-fluid">

    <div class="row">
        <div class="col-md-8 col-md-offset-3"> <!-- width and position of the outside border box -->
            <div class="panel panel-default"> <!-- do not delete this (it's outside border lines) -->

                <div class="panel-heading"><h3 style="margin-left: 38%">Edit description</h3></div>

                    <div class="panel-body" style="margin-left: 30%; margin-right: 30%; margin-top: 3%">
                        <label for="category">Item category</label>
                            <select class="form-control">
                                <option>Fashion</option>
                                <option>Electronics</option>
                                <option>Sports</option>
                                <option>Health</option>
                                <option>Toy</option>
                            </select>
                        
                            <div class="form-group" style="float: left; margin-top: 4%">
                                <label for="price">Price</label>
                                <form class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="panel-body" style="margin-left: 10%; margin-right: 10%; margin-top: 3%">
                        <label for="input-title">Title</label>
                        <input type="text" class="form-control" placeholder="Title" />
                    </div>
                    <div class="panel-body" style="margin-left: 10%; margin-right: 10%;">
                        <label for="input-description">Description</label>
                        <textarea class="form-control" rows="20" placeholder="Description"></textarea>
                    </div>
                    <hr>
                        <form>
                            <div class="form-group" style="margin-left: 52%; margin-right: 10%;">
                                <label for="img-upload">Add images</label>

                                <div class="file-tab panel-body" style="margin-left: -5%">
                                    <button type="button" class="btn btn-default btn-file">
                                        <input type="file" name="file-input">
                                    </button>
                                    <!-- <button type="button" class="btn btn-default">Remove</button> -->
                                </div>
                            </div>
                        </form>
                    <hr>
                    <div style="margin-left: 37%; margin-bottom: 3%">
                        <input class="btn btn-default" type="submit" value="Apply change" >
                        <input class="btn btn-default" type="submit" value="Cancle" >
                    </div>
                   
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')