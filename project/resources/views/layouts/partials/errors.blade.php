@if(count($errors)==1)

    <div class="form-group">

        <div class="alert alert-danger">

                @foreach($errors->all() as $error)

                    {{ $error }}

                @endforeach

        </div>

    </div>

@elseif(count($errors))

    <div class="form-group">

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    </div>

@endif