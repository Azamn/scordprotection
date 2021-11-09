@extends("layouts.base")

@section('content')

<section id="page-content" class="p-0">
    <section class="background-colored">
        <div id="particles-dots" class="particles"></div>
        <div class="container">
            <div class="heading-text text-light text-center">
                <strong>
                    <h4>OUR CLIENTS</h4>
                </strong>

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row team-members m-t-40">
            <div class="container mt-5 mb-5">
                <div class="row">
            @foreach (@$ourClientData as $client)

            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{ $client['image_url']}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>{{ $client['name'] }}</h3>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section> <!-- end: Content -->

@endsection
