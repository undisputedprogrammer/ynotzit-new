<x-admin.admin-layout>
<!-- component -->


        <!-- ./Sidebar -->

    <div class="w-full">

            <h2 class="text-lg md:text-xl lg:text-2xl text-center font-inter_semibold">Welcome admin! Your dashboard is under development</h2>


    </div>


    <script>
      const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }
          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

        return {
          loading: true,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
        }
      }
    </script>
</x-admin.admin-layout>
