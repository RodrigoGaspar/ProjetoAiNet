@extends('layouts.main')
<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>movie_id</th>
                <th>theater_id</th>
                <th>date</th>
                <th>start_time</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($screenings as $screening)
                <tr>
                    <td>{{ $screening->movie_id }}</td>
                    <td>{{ $screening->theater_id }}</td>
                    <td>{{ $screening->date }}</td>
                    <td>{{ $screening->start_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>