<div class="wrapper">

    {{-- @include('components.preloder') --}}

    @include('components.navbar')

    @include('components.sidebar')

    <div class="content-wrapper">

                <livewire:customer.view />

            </div>
        </section>

    </div>

    @include('components.footer')

</div>
