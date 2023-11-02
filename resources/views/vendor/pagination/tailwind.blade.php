@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="d-flex justify-content-end flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="disabled relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <i class="fa fa-arrow-left font-size-14"></i>
                </span>
            @else
                <a style="color: rgba(0, 0, 0, 0.8)!important;" href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <i class="fa fa-arrow-left font-size-14"></i>
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a style="color: rgba(0, 0, 0, 0.8)!important;" href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-1 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <i class="fa fa-arrow-right font-size-14"></i>
                </a>
            @else
                <span class="disabled relative inline-flex items-center px-3 py-1 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <i class="fa fa-arrow-right font-size-14"></i>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between mt-2">
            <div class="d-flex justify-content-end">
                <p class="text-sm text-gray-700 leading-5">
                    @if ($paginator->firstItem())
                        <span class="font-medium font-size-14">{{ $paginator->firstItem() }}</span>
                        ..
                        <span class="font-medium font-size-14">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('pagination.of') !!}
                    <span class="font-medium font-size-14">{{ $paginator->total() }}</span>
                    {!! __('pagination.results') !!}
                </p>
            </div>
        </div>
    </nav>
@endif
