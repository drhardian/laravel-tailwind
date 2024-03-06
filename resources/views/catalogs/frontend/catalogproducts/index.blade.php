@extends('layout.index')

@section('content')
<div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow space-y-4">
        <div class="relative mx-8 mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6">
                @foreach ($catalogproducts as $catalogproduct)
                    <div class="rounded-md bg-white border-slate-200 border">
                        <div class="relative">
                            <a href="#">
                                {{-- <img class="w-full" src="https://hixstudio.net/tphtml/ebazer/assets/img/product/prodcut-1.jpg"> --}}
                                <img class="w-full" src="{{ asset('').$catalogproduct->product_image }}" width="30">
                            </a>
                            <div class="absolute top-5 right-2 z-10">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="relative">
                                        <button class="w-8 h-8 text-sm bg-green-800 text-white rounded-md hover:bg-green-600 flex items-center justify-center">
                                            <svg height="12" viewBox="0 0 492.49284 492" width="12" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="m304.140625 82.472656-270.976563 270.996094c-1.363281 1.367188-2.347656 3.09375-2.816406 4.949219l-30.035156 120.554687c-.898438 3.628906.167969 7.488282 2.816406 10.136719 2.003906 2.003906 4.734375 3.113281 7.527344 3.113281.855469 0 1.730469-.105468 2.582031-.320312l120.554688-30.039063c1.878906-.46875 3.585937-1.449219 4.949219-2.8125l271-270.976562zm0 0"></path>
                                                <path fill="currentColor" d="m476.875 45.523438-30.164062-30.164063c-20.160157-20.160156-55.296876-20.140625-75.433594 0l-36.949219 36.949219 105.597656 105.597656 36.949219-36.949219c10.070312-10.066406 15.617188-23.464843 15.617188-37.714843s-5.546876-27.648438-15.617188-37.71875zm0 0"></path>
                                            </svg>
                                        </button>                                                                           
                                    </div>
                                    <div class="relative">
                                        <button class="w-8 h-8 text-sm bg-white border border-gray text-slate-600 rounded-md hover:bg-danger hover:border-red-700 hover:text-red-700 flex items-center justify-center">
                                            <svg width="14" height="14" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.0697 4.23C17.4597 4.07 15.8497 3.95 14.2297 3.86V3.85L14.0097 2.55C13.8597 1.63 13.6397 0.25 11.2997 0.25H8.67967C6.34967 0.25 6.12967 1.57 5.96967 2.54L5.75967 3.82C4.82967 3.88 3.89967 3.94 2.96967 4.03L0.929669 4.23C0.509669 4.27 0.209669 4.64 0.249669 5.05C0.289669 5.46 0.649669 5.76 1.06967 5.72L3.10967 5.52C8.34967 5 13.6297 5.2 18.9297 5.73C18.9597 5.73 18.9797 5.73 19.0097 5.73C19.3897 5.73 19.7197 5.44 19.7597 5.05C19.7897 4.64 19.4897 4.27 19.0697 4.23Z" fill="currentColor"></path>
                                                <path d="M17.2297 7.14C16.9897 6.89 16.6597 6.75 16.3197 6.75H3.67975C3.33975 6.75 2.99975 6.89 2.76975 7.14C2.53975 7.39 2.40975 7.73 2.42975 8.08L3.04975 18.34C3.15975 19.86 3.29975 21.76 6.78975 21.76H13.2097C16.6997 21.76 16.8398 19.87 16.9497 18.34L17.5697 8.09C17.5897 7.73 17.4597 7.39 17.2297 7.14ZM11.6597 16.75H8.32975C7.91975 16.75 7.57975 16.41 7.57975 16C7.57975 15.59 7.91975 15.25 8.32975 15.25H11.6597C12.0697 15.25 12.4097 15.59 12.4097 16C12.4097 16.41 12.0697 16.75 11.6597 16.75ZM12.4997 12.75H7.49975C7.08975 12.75 6.74975 12.41 6.74975 12C6.74975 11.59 7.08975 11.25 7.49975 11.25H12.4997C12.9097 11.25 13.2497 11.59 13.2497 12C13.2497 12.41 12.9097 12.75 12.4997 12.75Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 py-5">
                            <a href="#" class="text-sm font-normal text-heading text-hover-primary mb-2 inline-block leading-none">{{ $catalogproduct->product_name }}</a>
                            <p><a href="#" class="text-xs font-normal text-slate-500 text-heading text-hover-primary mb-2 inline-block leading-none">{{ $catalogproduct->productgroup_code }}</a></p>
                            <div class="flex items-center space-x-1 text-sm mb-5">
                                {{-- <span class="text-yellow-300 flex items-center space-x-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span> --}}
                            </div>
                            <div class="leading-none mb-2">
                                <span class="text-base font-medium text-black">Rp. {{number_format($catalogproduct->product_price)}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
