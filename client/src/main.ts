import { bootstrapApplication } from '@angular/platform-browser';
import { AppComponent } from './app/app.component';
import { provideRouter } from '@angular/router';
import { HttpClientModule, provideHttpClient } from '@angular/common/http';
import { importProvidersFrom } from '@angular/core';

bootstrapApplication(AppComponent, {
  providers: [
    importProvidersFrom(HttpClientModule),
    provideRouter([
      {
        path: "",
        loadChildren: () => import('./app/components/main-routes').then(m => m.ROUTES)
      },
      {
        path: "**",
        loadComponent: () => import('./app/components/main/main.component').then(m => m.MainComponent)
      }
    ]),
  ]
})
.catch(err => console.error(err));