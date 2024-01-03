    <!-- New modal -->
    <div id="calibrationModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                {{-- Tambahkan If Untuk Page Yang perlu Di tampilkan --}}
                @include('valve_repair.calibration.isolation.formModalIsolation')
            </div>
        </div>
    </div>

