import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LocationService } from 'src/app/services/location.service';
import { HttpClientModule } from '@angular/common/http';
import { ActivatedRoute, Router, RouterModule } from '@angular/router';
import { apiResponse } from '../model/api-response';

@Component({
  selector: 'app-main',
  standalone: true,
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.css'],
  imports: [CommonModule, HttpClientModule, RouterModule]
})
export class MainComponent {

  cityIds: any = {
    "yokohama": "518a2f247160746140590382efece1b84140f00101f901ca09290000000000c00207",
    "tokyo": "51ec1681b13e7861405921ae9cbd33d74140f00101f901d58b170000000000c00208",
    "kyoto": "5198a3c7ef2df86040590470b378b1824140f00101f901a275050000000000c00208",
    "osaka": "51749e0ce90bf0604059ea6fae06cd584140f00101f9011279050000000000c00208",
    "sapporo": "5115e7035d56ab614059f838d384ed874540f00101f901f5573e0000000000c00208",
    "nagoya": "5145903985cb1c614059d5eb1681b1974140f00101f901aad6450000000000c00208"
  };

  cities = ["Tokyo", "Yokohama", "Kyoto", "Osaka", "Sapporo", "Nagoya"];
  active_city: any = "Osaka";
  weather_data: any[] = [];
  place_details: any;
  has_place = false;
  constructor(
    private location_service: LocationService,
    public route: ActivatedRoute,
    public router: Router
  ){}

  ngOnInit() {
    this.getInfo(this.active_city);
  }

  getInfo(city_name?: any) {
    this.has_place = false;
    this.active_city = city_name;
    this.location_service.getWeatherForeCast({city: city_name}).subscribe({
      next: (resp) => {
        this.weather_data = [];
        for(let x = 0; x <= resp.data.list.length; x += 3) {
          this.weather_data.push(resp.data.list.slice(x, x+3));
        }
      },
      complete: () => {
        this.place();
      }
    });
  }

  place() {
    let place_parameter = {
      id: this.cityIds[this.active_city.toLocaleLowerCase()]
    }
    this.location_service.getPlaceDetails(place_parameter).subscribe({
      next: (response: any) => {
        this.place_details = response;

        if (response.success) {
          this.has_place = response.success;
        }
      }
    });
  }
}
