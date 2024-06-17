@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'C')
    <x-app-layout>
        <div class="container mx-auto w-1/2 px-4 py-8">
            <h2 class="text-2xl font-bold text-white mb-4">Purchase History</h2>
            @if($purchases->isEmpty())
                <p>You have no purchase history.</p>
            @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Payment Type
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-">
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                        {{ $purchase->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{ $purchase->payment_type }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{ $purchase->total_price }}€
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Adicionar links de paginação -->
                <div class="mt-4">
                    {{ $purchases->links() }}
                </div>
            @endif
        </div>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif
