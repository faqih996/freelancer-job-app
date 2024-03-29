@extends('layouts.app')

@section('title', ' My Service')

@section('content')

    @if(count($services))
        <main class="h-full overflow-y-auto">
            <div class="container mx-auto">
                <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                    <div class="col-span-8">
                        <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                            My Services
                        </h2>
                        <p class="text-sm text-gray-400">
                            {{ auth()->user()->Service()->count() }} Total Services
                        </p>
                    </div>
                    <div class="col-span-4 lg:text-right">
                        <div class="relative mt-0 md:mt-6">
                            <a href="{{ route('member.service.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                + Add Service
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="container px-6 mx-auto mt-5">
                <div class="grid gap-5 md:grid-cols-12">
                    <main class="col-span-12 p-4 md:pt-0">
                        <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                            <table class="w-full" aria-label="Table">
                                <thead>
                                    <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                        <th class="py-4" scope="">Service Details</th>
                                        <th class="py-4" scope="">Role</th>
                                        <th class="py-4" scope="">Price</th>
                                        <th class="py-4" scope="">Status</th>
                                        <th class="py-4" scope="">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                    @forelse ($services as $key =>$service)
                                    <tr class="text-gray-700 border-b">
                                        <td class="w-2/6 px-1 py-5">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                    @if (isset( $service->thumbnail_service[0]->thumbnail) != null )
                                                        <img class="object-cover w-full h-full rounded" src="{{ url(Storage::url($service->thumbnail_service[0]->thumbnail)) }}" alt="thumbnail" loading="lazy" />
                                                    @else
                                                        <svg class="object-cover w-full h-full rounded text-gray-300" viewBox="0 0 24 24"">
                                                            <path d="M24.6175 47.3032C24.4665 47.3032 24.3387 47.251 24.2342 47.1464C24.1296 47.0419 24.0774 46.9141 24.0774 46.7632C24.0774 46.6122 24.1296 46.4844 24.2342 46.3799C24.3387 46.2753 24.4665 46.2231 24.6175 46.2231C24.7627 46.2231 24.8846 46.2753 24.9833 46.3799C25.0879 46.4844 25.1401 46.6122 25.1401 46.7632C25.1401 46.9141 25.0879 47.0419 24.9833 47.1464C24.8846 47.251 24.7627 47.3032 24.6175 47.3032ZM26.9517 46.5628H29.9135V47.251H26.0109V46.6238L28.9553 41.8675H26.0457V41.1793H29.8961V41.8065L26.9517 46.5628ZM31.4903 41.702C31.3393 41.702 31.2116 41.6497 31.107 41.5452C31.0025 41.4407 30.9502 41.3129 30.9502 41.1619C30.9502 41.0109 31.0025 40.8832 31.107 40.7786C31.2116 40.6741 31.3393 40.6218 31.4903 40.6218C31.6355 40.6218 31.7575 40.6741 31.8562 40.7786C31.9607 40.8832 32.013 41.0109 32.013 41.1619C32.013 41.3129 31.9607 41.4407 31.8562 41.5452C31.7575 41.6497 31.6355 41.702 31.4903 41.702ZM31.8736 42.4773V47.251H31.0809V42.4773H31.8736ZM34.1045 43.3571C34.2613 43.0842 34.4936 42.8577 34.8014 42.6776C35.115 42.4918 35.4779 42.3989 35.8903 42.3989C36.3142 42.3989 36.6975 42.5005 37.0401 42.7038C37.3886 42.907 37.6615 43.1945 37.859 43.5662C38.0564 43.932 38.1551 44.3589 38.1551 44.8467C38.1551 45.3287 38.0564 45.7585 37.859 46.136C37.6615 46.5134 37.3886 46.8067 37.0401 47.0158C36.6975 47.2248 36.3142 47.3294 35.8903 47.3294C35.4837 47.3294 35.1237 47.2394 34.8101 47.0593C34.5023 46.8735 34.2671 46.6441 34.1045 46.3712V49.5159H33.3118V42.4773H34.1045V43.3571ZM37.345 44.8467C37.345 44.4867 37.2724 44.1731 37.1272 43.9059C36.982 43.6388 36.7846 43.4355 36.5349 43.2961C36.291 43.1568 36.0209 43.0871 35.7247 43.0871C35.4344 43.0871 35.1643 43.1597 34.9146 43.3048C34.6707 43.4442 34.4732 43.6504 34.3223 43.9233C34.1771 44.1905 34.1045 44.5012 34.1045 44.8554C34.1045 45.2155 34.1771 45.532 34.3223 45.8049C34.4732 46.0721 34.6707 46.2782 34.9146 46.4234C35.1643 46.5628 35.4344 46.6325 35.7247 46.6325C36.0209 46.6325 36.291 46.5628 36.5349 46.4234C36.7846 46.2782 36.982 46.0721 37.1272 45.8049C37.2724 45.532 37.345 45.2126 37.345 44.8467Z" fill="#082431"/>
                                                        </svg>
                                                    @endif
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <a href="{{ '#' }}" class="font-medium text-black">
                                                        {{ $service->title ?? '' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-1 py-5 text-sm">
                                            {{ $service->user->detail_user->role ?? '' }}
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            {{ 'Rp'.number_format($service->price) ??  '' }}
                                        </td>
                                        <td class="px-1 py-5 text-sm text-green-500 text-md">
                                            {{ 'Active' }}
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            <a href="{{ route('member.service.edit', $service['id']) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                                Edit Service
                                            </a>
                                        </td>
                                    </tr>

                                    @empty

                                    {{-- empthy --}}

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </section>
        </main>

    @else

        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Requests Yet
                </h2>

                <p class="text-sm text-gray-400">
                    It seems that you haven’t provided any service. <br>
                    Let's create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('member.service.create') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Services
                    </a>
                </div>
            </div>
        </div>

    @endif

@endsection
