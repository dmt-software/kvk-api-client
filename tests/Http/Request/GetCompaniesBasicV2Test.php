<?php

namespace DMT\Test\KvK\Api\Http\Request;

use DMT\CommandBus\Validator\ValidationException;
use DMT\CommandBus\Validator\ValidationMiddleware;
use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use PHPUnit\Framework\TestCase;

/**
 * Class GetCompaniesBasicV2Test
 */
class GetCompaniesBasicV2Test extends TestCase
{
    /**
     * @dataProvider provideRequest
     *
     * @param GetCompaniesBasicV2 $request
     */
    public function testValidate(GetCompaniesBasicV2 $request)
    {
        $this->expectException(ValidationException::class);

        $validation = new ValidationMiddleware();
        $validation->execute($request, function () {});
    }

    public function provideRequest(): iterable
    {
        $request = new GetCompaniesBasicV2();
        $request->kvkNumber = '484563';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->kvkNumber = 'ABC84623';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->branchNumber = '78684623';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->branchNumber = 'I00078684623';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->rsin = 'NL989786543B01';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->postalCode = '1234 AB';
        yield [$request];

        $request = new GetCompaniesBasicV2();
        $request->postalCode = '1234';
        yield [$request];
    }
}
