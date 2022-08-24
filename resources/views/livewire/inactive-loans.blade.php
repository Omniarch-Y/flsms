<div class="wrapper">

    {{-- @include('components.preloder') --}}

    @include('components.navbar')

    @include('components.sidebar')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                <livewire:inactive-loans.view />

            </div>
        </section>

    </div>

    @include('components.footer')

</div>
