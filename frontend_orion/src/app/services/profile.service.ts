import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ProfileService {
  private API_URL = 'http://localhost:8000/api'; // Ajusta según tu configuración

  constructor(private http: HttpClient) {}

  getProfile(): Observable<any> {
    return this.http.get(`${this.API_URL}/profile`, { withCredentials: true });
  }

  updateProfile(data: any): Observable<any> {
    return this.http.put(`${this.API_URL}/profile`, data, { withCredentials: true });
  }
}
