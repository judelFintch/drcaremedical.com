@props(['status'])

<x-badge :color="$status->badgeColor()">{{ $status->label() }}</x-badge>
