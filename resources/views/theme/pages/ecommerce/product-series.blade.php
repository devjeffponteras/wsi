@extends('theme.main')

@section('pagecss')
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Book Series</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">The Wheel of Time</h5>
                        <p class="card-text">Number of Books: 14</p>
                        <p class="card-text">An epic fantasy series by Robert Jordan, continued by Brandon Sanderson.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Harry Potter</h5>
                        <p class="card-text">Number of Books: 7</p>
                        <p class="card-text">A series about a young wizard and his adventures at Hogwarts, written by J.K. Rowling.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">The Lord of the Rings</h5>
                        <p class="card-text">Number of Books: 3</p>
                        <p class="card-text">A high fantasy epic by J.R.R. Tolkien, focusing on the quest to destroy the One Ring.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">A Song of Ice and Fire</h5>
                        <p class="card-text">Number of Books: 5 (planned 7)</p>
                        <p class="card-text">A series of epic fantasy novels by George R.R. Martin, inspiring the Game of Thrones TV series.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">The Chronicles of Narnia</h5>
                        <p class="card-text">Number of Books: 7</p>
                        <p class="card-text">A series of fantasy novels by C.S. Lewis, exploring the adventures in the magical land of Narnia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <!-- Add any additional JS here -->
@endsection
