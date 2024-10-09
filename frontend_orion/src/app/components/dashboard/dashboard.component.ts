// src/app/components/dashboard/dashboard.component.ts
import { Component, OnInit } from '@angular/core';
import { ConstellationService } from '../../services/constellation.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
})
export class DashboardComponent implements OnInit {
  constellations: any[] = [];

  constructor(private constellationService: ConstellationService) {}

  ngOnInit(): void {
    this.constellationService.getConstellations().subscribe(
      (data) => {
        this.constellations = data;
      },
      (error) => {
        console.error('Error al obtener constelaciones', error);
      }
    );
  }
}
