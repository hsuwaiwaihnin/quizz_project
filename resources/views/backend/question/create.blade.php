@extends('backendtemplate')

@section('content')
<h1>Create Question</h1>

<form action="{{route('question.store')}}" method="post">
    @csrf
    <div class="row">

    <div class="col-md-12 my-3">
        <select name="subject">
            <option>--Select Subject--</option>
            @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
            @endforeach
        </select>

    </div>

    <div class="col-md-12 my-3"> 
        <textarea name="question" placeholder="Enter your question."></textarea>
    </div>

    <div class="col-md-12 my-3">
        <input type="radio" name="status" value="1" checked id="mutilbtn">MultiChoice
        <input type="radio" name="status" value="0" id="tfbtn">True False
    </div>

    <div class="col-md-12 my-3" id="formultiplechoice">
        <div class="my-2">
            <label for="answerone">Answer One:</label>
            <input type="text" name="answerone" class="ans1">
        </div>
        <div class="my-2">
            <label for="answertwo">Answer Two:</label>
            <input type="text" name="answertwo" class="ans2">
        </div>
        <div class="my-2">
            <label for="answerthree">Answer Three</label>
            <input type="text" name="answerthree" class="ans3">
        </div>
        <div class="my-2">
            <label for="question">Answer Four</label>
            <input type="text" name="answerfour" class="ans4">
        </div>
        <div>
            <label for="question">Right Answer</label>
            <select name="rightanswer">
                <option>This is answer</option>
                <option  id="val1"></option>
                <option  id="val2"></option>
                <option  id="val3"></option>
                <option  id="val4"></option>
            </select>
        </div>
    </div>

    <div class="col-md-12" id="fortruefalse">
        <div>
            <label for="question">Right Answer</label>
            <select name="rightanswer1">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
        </div>
    </div>

    <button type="reset" class="btn btn-secondary text-uppercase mr-2"> 
        <i class="fas fa-times mr-2"></i> Cancel 
    </button>
    <button type="submit" class="btn btn-primary text-uppercase"> 
        <i class="fas fa-save mr-2"></i> Create
    </button>
</div>
</form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            // alert('0k');
            $('#fortruefalse').hide();
            $('#mutilbtn').click(function () {
                // alert('multi');
                $('#formultiplechoice').show();
                $('#fortruefalse').hide();

            });
             $('#tfbtn').click(function () {
                // alert('tf');
                $('#formultiplechoice').hide();
                $('#fortruefalse').show();
            });
             $('.ans1').keyup(function () {
                // alert($(this).val());
                 $('#val1').html($(this).val());
                 $('#val1').val($(this).val());
             });
             $('.ans2').keyup(function () {
                // alert($(this).val());
                 $('#val2').html($(this).val());
                 $('#val2').val($(this).val());
             });
             $('.ans3').keyup(function () {
                // alert($(this).val());
                 $('#val3').html($(this).val());
                 $('#val3').val($(this).val());
             });
             $('.ans4').keyup(function () {
                // alert($(this).val());
                 $('#val4').html($(this).val());
                 $('#val4').val($(this).val());
             });
        })
    </script>
@endsection