<div x-data="{ 
            tab: 'posts', 
            getAddRoute() { 
                return (this.tab === 'posts') ? '{{ route('posts.create') }}' 
                    : (this.tab === 'workHistory') ? '{{ route('work_history.create') }}' 
                    : (this.tab === 'socials') ? '{{ route('socials.create') }}'
                    : (this.tab === 'about') ? '{{ route('portfolio.create') }}'
                    : '{{ route('projects.create') }}'; 
            } 
        }" class="container-fluid">