import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ConstellationService {
  private API_URL = 'http://localhost:8000/api'; // Ajusta según tu configuración

  constructor(private http: HttpClient) {}

  getConstellations(): Observable<any> {
    return this.http.get(`${this.API_URL}/constellations`, { withCredentials: true });
  }

  getConstellation(id: number): Observable<any> {
    return this.http.get(`${this.API_URL}/constellations/${id}`, { withCredentials: true });
  }

  createConstellation(data: any): Observable<any> {
    return this.http.post(`${this.API_URL}/constellations`, data, { withCredentials: true });
  }

  updateConstellation(id: number, data: any): Observable<any> {
    return this.http.put(`${this.API_URL}/constellations/${id}`, data, { withCredentials: true });
  }

  deleteConstellation(id: number): Observable<any> {
    return this.http.delete(`${this.API_URL}/constellations/${id}`, { withCredentials: true });
  }
}
