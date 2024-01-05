@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-xs lg:max-w-7xl">
        <div class="mt-5">
            <div class="grid gap-4">
                <div class="max-w-full">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-center mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Scan Here</h5>
                        </div>
                        <div class="flow-root">
                            <div id="reader" width="600px"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flow-root">
                            <h5 class="mb-3 text-base font-bold text-gray-900 md:text-xl dark:text-white">Product Details</h5>
                        </div>
                        <div class="flex-1 min-w-0">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Description
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                <span id="product_description">-</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Current Stock
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                <span id="product_stockcurrent">-</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        $(document).ready(function() {
            var lastResult = "";
            var countResult = 0;

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: 400
                },
                /* verbose= */
                false);
            html5QrcodeScanner.render(onScanSuccess);

            function onScanSuccess(decodedText, decodedResult) {
                // handle the scanned code as you like, for example:
                if(decodedText !== lastResult) {
                    countResult++;
                    lastResult = decodedText;

                    console.log(`Code matched = ${decodedText}`, decodedResult);

                    setTimeout(() => {
                        getProductDetails(decodedText);
                    }, 1000);
                }
                // console.log(`Code matched = ${decodedText}`, decodedResult);
            }
        });

        // function onScanFailure(error) {
        //     // handle scan failure, usually better to ignore and keep scanning.
        //     // for example:
        //     console.warn(`Code scan error = ${error}`);
        // }

        function getProductDetails(id)
        {
            $.ajax({
                type: "get",
                url: "{{ route('inv.qrcode.product.details') }}",
                data: {
                    id:id
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>
@endsection
