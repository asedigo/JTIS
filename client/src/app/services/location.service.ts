import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { apiResponse } from '../components/model/api-response';

@Injectable({
  providedIn: 'root'
})
export class LocationService {

  apiURL = environment.api;

  constructor(
    private http: HttpClient
  ) { }

  getWeatherForeCast(parameter: {city: string}) {
    return this.http.post<apiResponse>(this.apiURL + 'weather_forecast', parameter);
  }

  getPlaceDetails(parameter: {id: any}) {
    return this.http.post(this.apiURL + 'place_details', parameter);
  }
}
