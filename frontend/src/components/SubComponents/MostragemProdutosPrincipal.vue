<template>
    <div>
        <v-row>
            <v-col sm="12" lg="12" md="12" xs="12" class="mt-12">
                <h2 class="text-h2 text-center">Aqui estão alguns de nossos produtos</h2>
            </v-col>
        </v-row>
        <v-row class="d-flex justify-center">
            <v-col sm="6" lg="6" md="6" xs="6">
                <v-carousel 
                    hide-delimiters 
                    show-arrows="hover" 
                    cycle
                    ><!-- interval="3000" -->
                    <v-carousel-item cover src="https://cdn.vuetifyjs.com/images/cards/docks.jpg">
                        <v-sheet>
                            asdasd
                        </v-sheet>
                    </v-carousel-item>
                    <v-carousel-item cover src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"></v-carousel-item>
                    <v-carousel-item cover src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-carousel-item>
                </v-carousel>
            </v-col>
        </v-row>
    </div>
</template>