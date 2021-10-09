@extends("layouts.base")

@section('content')

<section id="page-content" class="p-0">
    <section id="page-title" data-bg-parallax="{{{asset('images/scordimg/bg.jpg')}}}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">OUR CLIENTS</h1>
            </div>
        </div>
    </section>
    <div class="line"></div>
    <div class="container">
        <div class="text-center heading-text heading-section">
            <h2>OUR CLIENTS</h2>
        </div>
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
            {{-- <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/3.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Shabbir Quettawalla</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/4.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Imran Paloba</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/5.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Adv.Mohseen Shaikh</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/6.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Anwar Choudhry</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/7.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Fahim Ahmed kagzi</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/8.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Gulam Chunawala</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/9.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Abdul Rahim Khan</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/10.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Juzer Master</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/11.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Sameer Dabbawala</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/12.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Tabrez Rubberwala</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/13.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Abbas Dohadwala(exp.)</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <div class="team-image card">
                        <img src="{{asset('images/scordimg/14.jpeg')}}" height="500" style="object-fit: contain; object-position: center;">
                    </div>
                    <div class="team-desc">
                        <h3>Saifee Dalal</h3>
                    </div>
                </div>
            </div> -- --}}

        </div>
    </div>
</section> <!-- end: Content -->

@endsection
