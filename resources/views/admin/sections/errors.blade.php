@if ($errors->any())
    <div class="alert-section">
        <ul class="alerts">
            @foreach ($errors->all() as $error)
                <li class="alert-text">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
