@extends('welcome')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



<style>
        body {
        margin-top:40px;
    }
    .stepwizard-step p {
        margin-top: 10px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 50%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>

<div class="container"></div>,<div class="container">

    <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
          </div>
        </div>
      </div>

        <form action="{{ route('general.store') }}" method="POST">
        <div class="row setup-content" id="step-1">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 1</h3>
                <div class="form-group">
                    <div class="col-lg-6">
                    <label>Client</label>
                        <select class="form-control" name="id_client">
                        @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->prenom}} {{$client->nom}} {{$client->telephone}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label>Table</label>
                            <select class="form-control" name="id_table">
                            @foreach ($tables as $table)
                            <option value="{{$table->id}}">{{$table->numero}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>

              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
            </div>
          </div>
        </div>
        <div class="row setup-content" id="step-2">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 2</h3>
              <div class="form-group">
                <label class="control-label">Company Name</label>
                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
              </div>
              <div class="form-group">
                <label class="control-label">Company Address</label>
                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
              </div>
              <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
            </div>
          </div>
        </div>
        <div class="row setup-content" id="step-3">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 3</h3>
              <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
              <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </form>

    </div>
    <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepWizard.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>

@endsection
