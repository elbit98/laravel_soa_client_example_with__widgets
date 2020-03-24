<div>
    <form action="{{ route('reviews.store', ['page_uid' => $config['page_uid']]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="review">Review</label>
            <input type="text" class="form-control" name="review" id="review" placeholder="review">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<hr>
@foreach($config['all'] as $record)
    <span>{{ $record['email'] }} </span> |
    <span>{{ $record['review'] }} </span> <br>
    <hr>
@endforeach
