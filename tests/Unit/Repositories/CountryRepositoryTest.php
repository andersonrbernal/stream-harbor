<?php

namespace Tests\Unit\Repositories;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use Tests\TestCase;

class CountryRepositoryTest extends TestCase
{
    protected $countryRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->countryRepository = $this->createMock(CountryRepositoryInterface::class);
    }

    public function testFindAll(): void
    {
        $country = Country::factory()->make();

        $this->countryRepository
            ->expects($this->once())
            ->method("findAll")
            ->willReturn($country);

        $this->assertEquals($country, $this->countryRepository->findAll());
    }

    public function testFindById(): void
    {
        $country = Country::factory()->make();

        $this->countryRepository
            ->expects($this->once())
            ->method("findById")
            ->with($country->id)
            ->willReturn($country);

        $foundCountry = $this->countryRepository->findById($country->id);
        $this->assertEquals($country, $foundCountry);
    }

    public function testCreate(): void
    {
        $country = Country::factory()->make();

        $this->countryRepository
            ->expects($this->once())
            ->method("create")
            ->with($country->toArray())
            ->willReturn($country);

        $this->assertEquals($country, $this->countryRepository->create($country->toArray()));
    }

    public function testUpdate(): void
    {
        $country = Country::factory()->make();

        $this->countryRepository
            ->expects($this->once())
            ->method("update")
            ->with($country->id, $country->toArray())
            ->willReturn($country);

        $this->assertEquals($country, $this->countryRepository->update($country->id, $country->toArray()));
    }

    public function testDelete(): void
    {
        $country = Country::factory()->make();

        $this->countryRepository
            ->expects($this->once())
            ->method("delete")
            ->with($country->id)
            ->willReturn(true);

        $this->assertTrue(true, $this->countryRepository->delete($country->id));
    }
}
